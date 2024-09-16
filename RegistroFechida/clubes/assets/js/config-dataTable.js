let dataOrderable = typeof $('.table_responsive').data("orderable")!="undefined" ? $('.table_responsive').data("orderable").split(",").map(element => parseInt(element)) : [];
$('.table_responsive').DataTable({
  responsive: true,
    searching: false,
    paging: false,
    order: [],
    columnDefs: [
      { "orderable": false, "targets": "_all"} 
    ],
    ajax: 'api/ajax.php?endpoint=get_jueces',
    processing: true,
    serverSide: true
});