<center>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"
    style="font-family: 'Roboto', sans-serif; width: 100%;">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <tbody>
        <tr>
            <td align="center">
                <table class="" width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td align="center" valign="top">
                                <table class="" width="900"  align="center" cellpadding="0"
                                    cellspacing="0" style="border: 1px solid #3F51B5;">
                                    <tbody>
                                        <tr>
                                            <td width="450"><img src="{{ asset('email_images/back-part--voucher.jpg') }}" alt="" width="100%"/></td>
                                            <td width="350">
                                                <table class="" border="0" align="center" cellpadding="0"
                                                    cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" style="line-height: 0px;">
                                                                <img style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                                    src="{{ asset('email_images/logo.png') }}"
                                                                    width="140" height="" alt="logo">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="display: block; height: 3px; background: #ff2c1b; margin: 10px 0;">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center"
                                                                style=" font-size: 30px; color: #000; line-height: 40px; font-weight: 600; letter-spacing: 2px;">
                                                                {{ $order['package']['package_name'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center"
                                                                style="font-size: 20px; color: #000; line-height: 40px; font-weight: 600; letter-spacing: 2px;">
                                                                Voucher Code: {{ $order['voucher_code'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center"
                                                                style="font-size: 20px; color: #000; line-height: 40px; font-weight: 600; letter-spacing: 2px;">
                                                                Issued On:
                                                                {{ date('M d,Y', strtotime($order['created_at'])) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center"
                                                                style="font-size: 20px; color: #000; line-height: 40px; font-weight: 600; letter-spacing: 2px;">
                                                                Validity Upto:
                                                                {{ $order['package']['package_validity'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center"
                                                                style="font-size: 16px; color: rgb(0 0 0 / 70%); line-height: 24px; font-weight: 600; letter-spacing: 1px;">
                                                                For any enquiry, contact us at enquiry@fmvacation.com
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" style="line-height: 0px;">
                                                                <img style="display:block; line-height:0px; font-size:0px; border:0px; width: 100px; height: 100px;"
                                                                    src="{{ asset('email_images/qr.jpg') }}"
                                                                    width="450" height="" alt="logo">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center"
                                                                style="font-size: 16px; color: rgb(0 0 0 / 70%); line-height: 24px; font-weight: 600; letter-spacing: 1px;">
                                                                Visit us <a href="https://fmvacations.com"
                                                                    target="_blank"
                                                                    style="color: rgb(0 0 0 / 70%); text-decoration:none;">www.fmvacations.com</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="20"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
</center>
