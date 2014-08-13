function get_total_hours(datetime_in,datetime_out)
{
    var result = "";

    if(datetime_out > datetime_in)
    {
        result = (datetime_out-datetime_in) / 3600000;// 3600000 = 1 hr
        result = parseFloat(result).toFixed(2);    
    }
    
    return result;
}