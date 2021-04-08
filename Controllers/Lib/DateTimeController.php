<?php
class DateTimeController 
{
    // chọn ngày
    public function makeSelectDay(){
        $html = '<select class="btn btn-primary input-item" name="day"><option value="">Tổng danh thu theo ngày</option>';
        for($day = 1; $day <= 31; $day++){
            $selected = "";
            if (isset($data["day"]) && $data["day"] == $day) {
                $selected = "selected";
            }
            $html .= '<option value='.$day.' '.$selected.'>'.$day.'</option>';
        }
        $html .= '</select>';
        return $html;
    }

    // chọn tháng
    public function makeSelectMonth(){
        $html = '<select class="btn btn-info input-item" name="month"><option value="">Tổng danh thu theo tháng</option>';
        for($month = 1; $month <= 12; $month++){
            $selected = "";
            if(isset($data['month']) && $data['month'] == $month){
                $selected = "selected";
            }
            $html .= '<option value='.$month.' '.$selected.'>'.$month.'</option>';
        }
        $html .= '</select>';
        return $html;
    }

    // chọn năm
    public function makeSelectYear(){
        $html ='<select class="btn btn-warning input-item" name="year"><option value="">Tổng danh thu theo tháng</option>';
        for($year = 2021; $year <= 2021; $year++){
            $selected = "";
            if(isset($data['year']) && $data['year'] == $year){
                $selected = "selected";
            }
            $html .= '<option value='.$year.''.$selected.'>'.$year.'</option>';
        }
        $html .= '</select>';
        return $html;
    }

}
