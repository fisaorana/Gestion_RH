
$.ajax({
        url:'dashboard.php',
        type:'GET',
        data:'valsall=' + encodeURIComponent(valsall),
        success:function(data){
          if (data!="") {
            var Countvalsall=valsall.length;
            $('#btn_del_all').attr('href','dashboard.php?id_sup_emp='+valsall+'&conf_supp=show&nbrsupp='+Countvalsall)
          } else {
            
          }
        },
        error:function(data){
          alert("error");
        },
      });