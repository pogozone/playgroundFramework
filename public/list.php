<head>
    <link href="/public/assets/style.css" rel="stylesheet"/>
    <link href="/assets/tabulator-master/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="/assets/tabulator-master/dist/js/tabulator.min.js"></script>
</head>
<body>

<h1>Eine Übersicht</h1>
<p>Eintrag anklicken um zur Bearbeitungsmaske zu gelangen.</p>

<div id="plant-table"></div>
<script>
    tabledata = <?php echo json_encode($plants); ?>

    const table = new Tabulator("#plant-table", {
        data:tabledata,           //load row data from array
        layout:"fitColumns",      //fit columns to width of table
        pagination:"local",       //paginate the data
        paginationSize:7,         //allow 7 rows per page of data
        paginationCounter:"rows", //display count of paginated rows in footer
        columns:[                 //define the table columns
            {title:"Name", field:"name"},
            {title:"Description", field:"description"},
            {title:"Type", field:"type"},
            {title:"Year", field:"year"},
            {title:"Month", field:"month"},
            {title:"Slug", field:"slug"},
        ],
    });

    table.on("rowClick", function(e, row){
        window.location.href = '/edit/'+row.getIndex();
    });
</script>
</body>

