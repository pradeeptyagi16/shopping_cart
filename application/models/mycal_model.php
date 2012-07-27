<?php
class Mycal_model extends Model {
	
	function generate_cal_model()
    {
        $prefs['template'] = '
           {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}
           
           {heading_row_start}<tr>{/heading_row_start}
           {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
           
           {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
           {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

           {heading_row_end}</tr>{/heading_row_end}
           {week_row_start}<tr >{/week_row_start}
           
           {week_day_cell}<td class="day">{week_day}</td>{/week_day_cell}
           {week_row_end}</tr>{/week_row_end}

           {cal_row_start}<tr class="week_row">{/cal_row_start}
           {cal_cell_start}<td>{/cal_cell_start}

           {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
           {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

           {cal_cell_no_content}{day}{/cal_cell_no_content}
           {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

           {cal_cell_blank}&nbsp;{/cal_cell_blank}
           {cal_cell_end}</td>{/cal_cell_end}
           {cal_row_end}</tr>{/cal_row_end}
           {table_close}</table>{/table_close}
        ';
        $prefs = array (
               'show_next_prev'=> TRUE,
               'next_prev_url' => 'http://localhost/pradeep.kumar/shoping_cart/index.php/mycal/generate_calendar/'
             );
        $this->load->library('calendar',$prefs);
        if($this->uri->segment(3)!==null)
        {
            echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
        }
        else
        {
            echo $this->calendar->generate();
        }
    }

}
