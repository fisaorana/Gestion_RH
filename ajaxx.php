// ajax pour chercher
// function chrc_use(){
//   $('#resulta_recherche').html('');
//   var user_chercher=$('#serch_user').val()
//     if(user_chercher!=""){
//       $.ajax({
//         url:'ajax/recherche_utilisateur.php',
//         type:'GET',
//         data:'user_chercher=' + encodeURIComponent(user_chercher),
//         success:function(data){
//           if (data!="") {
//             $('#resulta_recherche').append(user_chercher);
//           } else {
            
//           }
//         },
//         error:function(data){
//           alert("error");
//         },
//       });
//     }
// }