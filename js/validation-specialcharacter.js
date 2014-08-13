function validate_specialcharacter(value)
{
    var strValidChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-=";
    var strChar;
    var blnResult = true;

    if (value.length == 0) return false;

    //  test value consists of valid characters listed above
    for (i = 0; i < value.length && blnResult == true; i++) {
        strChar = value.charAt(i);
        if (strValidChars.indexOf(strChar) == -1) {
            blnResult = false;
        }
    }
    return blnResult;
}