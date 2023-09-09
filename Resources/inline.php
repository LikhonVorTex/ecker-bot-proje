<?php
# SB
$sql = "SELECT * FROM gateway WHERE gatecmd='sb'";
    $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $sbstatus = $raw['status'];
    $sbcomment = $raw['comment'];
    mysqli_close(mysqlcon());
    if($sbstatus == "ON"){
        $sbtick = "✅";
    }elseif($sbstatus =="OFF"){
        $sbtick = "❌";
    }
    if($sbcomment == "not"){
        $sbcomment = "No comment added";
}

# PP
$sql = "SELECT * FROM gateway WHERE gatecmd='pp'";
    $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $ppstatus = $raw['status'];
    $ppcomment = $raw['comment'];
    mysqli_close(mysqlcon());
    if($ppstatus == "ON"){
        $pptick = "✅";
    }elseif($ppstatus =="OFF"){
        $pptick = "❌";
    }
    if($ppcomment == "not"){
        $ppcomment = "No comment added";
}

#ch
$sql = "SELECT * FROM gateway WHERE gatecmd='ch'";
    $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $chstatus = $raw['status'];
    $chcomment = $raw['comment'];

    if($chstatus == "ON"){
        $chtick = "✅";
    }elseif($chstatus =="OFF"){
        $chtick = "❌";
    }
if($chcomment == "not"){
        $chcomment = "No comment added";
}

#le
$sql = "SELECT * FROM gateway WHERE gatecmd='le'";
    $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $lestatus = $raw['status'];
    $lecomment = $raw['comment'];

    if($lestatus == "ON"){
        $letick = "✅";
    }elseif($lestatus =="OFF"){
        $letick = "❌";
    }
if($lecomment == "not"){
        $lecomment = "No comment added";
}

// sh
    $sql = "SELECT * FROM gateway WHERE gatecmd='sh'";
        $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $shstatus = $raw['status'];
    $shcomment = $raw['comment'];

    mysqli_close(mysqlcon());
    if($shstatus == "ON"){
        $shtick = "✅";
    }elseif($shstatus =="OFF"){
        $shtick = "❌";
    }
if($shcomment == "not"){
        $shcomment = "No comment added";
}
    # CSK


$sql = "SELECT * FROM gateway WHERE gatecmd='csk'";
        $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $cskstatus = $raw['status'];
    $cskcomment = $raw['comment'];
    mysqli_close(mysqlcon());
    if($cskstatus == "ON"){
        $csktick = "✅";
    }elseif($cskstatus =="OFF"){
        $csktick = "❌";
    }
if($cskcomment == "not"){
        $cskcomment = "No comment added";
}