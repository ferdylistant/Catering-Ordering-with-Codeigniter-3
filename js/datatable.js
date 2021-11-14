$(document).ready(function(){
        var table = $('#table').DataTable({
          rowReorder:{
            selector: 'td:nth-child(2)'
          },
          responsive: true
        });
      });