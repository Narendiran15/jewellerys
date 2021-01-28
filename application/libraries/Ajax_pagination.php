<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_pagination {

    var $base_url            = ''; 
    var $total_rows          = ''; 
    var $per_page             = 10; 
    var $num_links            =  2; 
    var $cur_page             =  0; 
    var $first_link           = '&lsaquo; First';
    var $next_link            = '&gt;';
    var $prev_link            = '&lt;';
    var $last_link            = 'Last &rsaquo;';
    var $uri_segment        = 3;
    var $full_tag_open        = '';
    var $full_tag_close        = '';
    var $first_tag_open        = '';
    var $first_tag_close    = '&nbsp;';
    var $last_tag_open        = '&nbsp;';
    var $last_tag_close        = '';
    var $cur_tag_open        = '&nbsp;<b>';
    var $cur_tag_close        = '</b>';
    var $next_tag_open        = '&nbsp;';
    var $next_tag_close        = '&nbsp;';
    var $prev_tag_open        = '&nbsp;';
    var $prev_tag_close        = '';
    var $num_tag_open        = '&nbsp;';
    var $num_tag_close        = '';
    var $div                = '';
    var $postVar             = '';

    function __construct($params = array())
    {
        if (count($params) > 0)
        {
            $this->initialize($params);        
        }
        
        log_message('debug', "Pagination Class Initialized");
    }
    
    function initialize($params = array())
    {
        if (count($params) > 0)
        {
            foreach ($params as $key => $val)
            {
                if (isset($this->$key))
                {
                    $this->$key = $val;
                }
            }        
        }
    }
   function create_links()
    {
        if ($this->total_rows == 0 OR $this->per_page == 0)
        {
           return '';
        }

       $num_pages = ceil($this->total_rows / $this->per_page);

        if ($num_pages == 1)
        {
            return '';
        }
     
        $CI =& get_instance();
        $var = 0;
        if($CI->input->post($this->postVar)):
            $var = $CI->input->post($this->postVar);
            settype($var, "integer");
        endif;
            
        if ($var !== 0)
        {
            $this->cur_page = $var;
            
            $this->cur_page = (int) $this->cur_page;
        }

        $this->num_links = (int)$this->num_links;
        
        if ($this->num_links < 1)
        {
            show_error('Your number of links must be a positive number.');
        }
                
        if ( ! is_numeric($this->cur_page))
        {
            $this->cur_page = 0;
        }
        
        if ($this->cur_page > $this->total_rows)
        {
            $this->cur_page = ($num_pages - 1) * $this->per_page;
        }
        
        $uri_page_number = $this->cur_page;
        $this->cur_page = floor(($this->cur_page/$this->per_page) + 1);

        $start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
        $end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

        $this->base_url = rtrim($this->base_url, '/') .'/';

         $output = '';

        if  ($this->cur_page > $this->num_links)
        {
            $link = $this->my_link_to_remote($this->base_url, $this->first_link, $this->div, NULL);
            $output .= $this->first_tag_open.$link.$this->first_tag_close;
        }

        if  ($this->cur_page != 1)
        {
            
            $i = $uri_page_number - $this->per_page;
            if ($i == 0){ 
                $i = '';
                $pars = NULL;
            } else {
                $pars = array($this->postVar=>$i);
            }
            $link = $this->my_link_to_remote($this->base_url, $this->prev_link, $this->div, $pars);
            $output .= $this->prev_tag_open.$link.$this->prev_tag_close;
        }

        for ($loop = $start -1; $loop <= $end; $loop++)
        {
            $i = ($loop * $this->per_page) - $this->per_page;
                    
            if ($i >= 0)
            {
                if ($this->cur_page == $loop)
                {
                    $output .= $this->cur_tag_open.$loop.$this->cur_tag_close; 
                }
                else
                {
                    $n = ($i == 0) ? '' : $i;
                    if($n !== ''){
                        $pars = array($this->postVar=>$n);
                    } else {
                        $pars = NULL;
                    }
                    $link = $this->my_link_to_remote($this->base_url, $loop, $this->div, $pars);                   
                    $output .= $this->num_tag_open.$link.$this->num_tag_close;
                    
                }
            }
        }

        if ($this->cur_page < $num_pages)
        {
            $pars = array($this->postVar=>($this->cur_page * $this->per_page));
            $link = $this->my_link_to_remote($this->base_url, $this->next_link, $this->div, $pars);
            $output .= $this->next_tag_open.$link.$this->next_tag_close;
        }

        if (($this->cur_page + $this->num_links) < $num_pages)
        {
            $i = (($num_pages * $this->per_page) - $this->per_page);
            $pars = array($this->postVar=>$i);
            $link = $this->my_link_to_remote($this->base_url, $this->last_link, $this->div, $pars);
            
          
            $output .= $this->last_tag_open.$link.$this->last_tag_close;
        }

        $output = preg_replace("#([^:])//+#", "\1/", $output);

        $output = $this->full_tag_open.$output.$this->full_tag_close;
        return $output;        
    }
    
    function my_link_to_remote($url, $text, $div, $pars=array()){
        if($pars !== NULL):
        foreach($pars as $k=>$v):
            $par = $k.":".$v;        
        endforeach;        
        
        
        $html = "<a href='' onclick='new Ajax.Updater(\"$div\",\"$url\",{method: \"post\", parameters:{\"page\":\"$v\"}, evalScripts:true});return false;'>$text</a>";
        else:
        $html = "<a href=''  onclick='new Ajax.Updater(\"$div\",\"$url\",{method: \"post\", evalScripts:true}); return false;' >$text</a>";
        endif;
    return $html;
    }
}

?>