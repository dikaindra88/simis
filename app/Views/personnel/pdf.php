<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data <?= $person[0]['name'] ?></title>
</head>

<body>
    <img src="img/logo2.png" style="width:120px; height:auto; position:absolute;">
    <table width="100%">

        <tr>
            <td align="center">
                <span style="line-height:1.6; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">
                    PERSONNEL TRAINING QUALIFICATION RECORD<br />TRI-M.G. INTRA ASIA AIRLINES
                </span>

            </td>
        </tr>
    </table>
    <hr style="border: 2px solid #000;" />

    <table class=" table table-striped table-middle" style="font-size: 8pt;font-family:Arial, Helvetica, sans-serif; text-align:left;" cellpadding="4">

        <tr>
            <th align="left" width="20%">Name</th>
            <td width="20%">:</td>
            <td><?php echo $person[0]['name']; ?></td>
        </tr>
        <tr>
            <th align="left">Position</th>
            <td>:</td>
            <td><?php echo $person[0]['position_name']; ?></td>
        </tr>

        <tr>
            <th align="left">A1</th>
            <td>:</td>
            <td><?php echo $person[0]['a1']; ?></td>
        </tr>
        <tr>
            <th align="left">A4</th>
            <td>:</td>
            <td><?php echo $person[0]['a4']; ?></td>
        </tr>
        <tr>
            <th align="left">A2</th>
            <td>:</td>
            <td><?php echo $person[0]['a2']; ?></td>
        </tr>
        <tr>
            <th align="left">A3</th>
            <td>:</td>
            <td><?php echo $person[0]['a3']; ?></td>
        </tr>
        <tr>
            <th align="left">C1</th>
            <td>:</td>
            <td><?php echo $person[0]['c1']; ?></td>
        </tr>
        <tr>
            <th align="left">C2</th>
            <td>:</td>
            <td><?php echo $person[0]['c2']; ?></td>
        </tr>
        <tr>
            <th align="left">C4</th>
            <td>:</td>
            <td><?php echo $person[0]['c4']; ?></td>
        </tr>
        <tr>
            <th align="left">AMEL No.</th>
            <td>:</td>
            <td><?php echo $person[0]['amel_no']; ?></td>
        </tr>
        <tr>
            <th align="left">AMEL Validity</th>
            <td>:</td>
            <td><?php echo $person[0]['amel_valid']; ?></td>
        </tr>
        <tr>
            <th align="left">RII No.</th>
            <td>:</td>
            <td><?php echo $person[0]['rii_no']; ?></td>
        </tr>
        <tr>
            <th align="left">Aircraft Type</th>
            <td>:</td>
            <td><?php echo $person[0]['ac_type']; ?></td>
        </tr>
        <tr>
            <th align="left">Basic Indoctrination</th>
            <td>:</td>
            <td><?php echo $person[0]['date_bi']; ?></td>
        </tr>
        <tr>
            <th>Human Factor</th>
        </tr>
        <tr>
            <th align="left">Initial</th>
            <td>:</td>
            <td><?php echo $person[0]['date_hf_initial']; ?></td>
        </tr>
        <tr>
            <th align="left">Last Rec.</th>
            <td>:</td>
            <td><?php echo $person[0]['date_hf_lastrec']; ?></td>
        </tr>
        <tr>
            <th align="left">Next Rec.</th>
            <td>:</td>
            <td><?php echo $person[0]['date_hf_nextrec']; ?></td>
        </tr>
        <tr>
            <th></th>
        </tr>
        <tr>
            <th align="left">Training of Trainer</th>
            <td>:</td>
            <td><?php echo $person[0]['date_tot']; ?></td>
        </tr>
        <tr>
            <th align="left">Basic Engineering & PPC</th>
            <td>:</td>
            <td><?php echo $person[0]['date_be_ppc']; ?></td>
        </tr>
        <tr>
            <th align="left">Logistic / Material Handling</th>
            <td>:</td>
            <td><?php echo $person[0]['date_material']; ?></td>
        </tr>
        <tr>
            <th>Aircraft Type Rating Course</th>
        </tr>
        <tr>
            <th align="left">Initial</th>
            <td>:</td>
            <td><?php echo $person[0]['date_atrc_initial']; ?></td>
        </tr>
        <tr>
            <th align="left">Last Rec.</th>
            <td>:</td>
            <td><?php echo $person[0]['date_atrc_lastrec']; ?></td>
        </tr>
        <tr>
            <th align="left">Next Rec.</th>
            <td>:</td>
            <td><?php echo $person[0]['date_atrc_nextrec']; ?></td>
        </tr>
        <tr>
            <th></th>
        </tr>
        <tr>
            <th align="left">INSP/RII</th>
            <td>:</td>
            <td><?php echo $person[0]['date_insp_rii']; ?></td>
        </tr>
        <tr>
            <th align="left">Safety Management System</th>
            <td>:</td>
            <td><?php echo $person[0]['date_sms']; ?></td>
        </tr>
        <tr>
            <th align="left">RVSM</th>
            <td>:</td>
            <td><?php echo $person[0]['date_rvsm']; ?></td>
        </tr>
        <tr>
            <th align="left">PBN</th>
            <td>:</td>
            <td><?php echo $person[0]['date_pbn']; ?></td>
        </tr>
    </table>
    <br />
    <br />
    <br />

</body>

</html>