<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="Pragma" content="no-cache" />

    <title>Browse Bills</title>

    {$_scripts}

</head>

<body>
    
    <h2>Upper Chamber</h2>
    {foreach from=$upperBills item="bill"  }

        <p> <span>{$bill.id} - {$bill.title}</span>
        </p>

    {/foreach}

    <h2>Lower Chamber</h2>
    {foreach from=$lowerBills item="bill"  }

        <p> <span>{$bill.id} - {$bill.title}</span>
        </p>

    {/foreach}

{$_bottomScripts}

</body>

</html>

