function isInteger(n) 
{
    n      = Number(n);
   return ((typeof n==='number')&&(n%1===0));
}


function validate_float(val)
{
    var decval = val.split(".");

    for(var a = 0; a<decval.length; a++){
        if(!isInteger(decval[a])){
            return false;
        }
        
    }
    return true;
}