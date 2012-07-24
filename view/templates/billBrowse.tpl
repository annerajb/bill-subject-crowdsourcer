<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="Pragma" content="no-cache" />

    <title>Browse Bills</title>

    {$_scripts}

</head>

<body>

    <h2>Upper Chamber: {$upperBills|@count} bills</h3>
    {foreach from=$upperBills item="bill"  }

        <div class="bill">
            <p> <span class="bold">ID:</span> <span>{$bill.id}</span>
            </p>
            <p> <span class="bold">Subject:</span> <span>{$bill.subject}</span>
            </p>
            <p> <span class="bold">Title:</span> <span>{$bill.title}</span>
            </p>
        </div>


    {/foreach}

    <h2>Lower Chamber: {$lowerBills|@count} bills</h3>
    {foreach from=$lowerBills item="bill"  }

        <div class="bill">
            <p> <span class="bold">ID:</span> <span>{$bill.id}</span>
            </p>
            <p> <span class="bold">Subject:</span> <span>{$bill.subject}</span>
            </p>
            <p> <span class="bold">Title:</span> <span>{$bill.title}</span>
            </p>
        </div>

    {/foreach}

{$_bottomScripts}

</body>

</html>

