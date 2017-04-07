<!DOCTYPE html>
<html>
    <head>
        <title>Form Validation</title>
        <script type="text/javascript">
            // Form validation code will come here.
            function validate()
            {
                //name
                if (document.myForm.name.value == "")
                {
                    alert("Please provide your name!");
                    document.myForm.name.focus();
                    return false;
                }
                //email
                if (document.myForm.Email.value == "")
                {
//                    alert("Please provide your email!");
                    document.myForm.Email.focus();
//                    return false;
                    errorArray.push("You need an email");
                } else
                {
                    var email = document.myForm.Email.value;
                    var patt = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
                    console.log(patt.test(document.myForm.Email.value))
                    if (!patt.test(email))
                    {
                        alert("Please enter a valid email, format: name@server.com. Using test!");
                        document.myForm.Email.focus();
                        return false;
                    }
                    if (!email.match(patt))
                    {
                        alert("Please enter a valid email, format: name@server.com. Using match!");
                        document.myForm.Email.focus();
                        return false;
                    }
                }
                //zip
                if (document.myForm.zip.value == "" ||
                        isNaN(document.myForm.zip.value) ||
                        document.myForm.zip.value.length != 5)
                {
                    alert("Please provide your zip in the format #####!");
                    document.myForm.zip.focus();
                    return false;
                }
                //country
                if (document.myForm.country.value == "")
                {
                    alert("Please provide your country!");
                    document.myForm.country.focus();
                    return false;
                }
                return(true);
            }
        </script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="/cgi-bin/test.cgi" name="myForm" onSubmit="return(validate());">
            <table cellspacing="2" cellpadding="2" border="1">
                <tr>
                    <td align="right">Name</td>
                    <td><input type="text" name="name" /></td>
                </tr>
                <tr>
                    <td align="right">Email</td>
                    <td><input type="text" name="Email" /></td>
                </tr>
                <tr>
                    <td align="right">Zip Code</td>
                    <td><input type="text" name="zip" /></td>
                </tr>
                <tr>
                    <td align="right">Country</td>
                    <td>
                        <select name="country">
                            <option value="-1" selected>[choose yours]</option>
                            <option value="1">USA</option>
                            <option value="2">UK</option>
                            <option value="3">INDIA</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td><input type="submit" name="Submit" onclick="return(validate());"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>