$(document).ready(function(){
    /**
     * Modal Home através do botão click-me
     * @type {*|jQuery|HTMLElement}
     */
   const $modal_home = $("#modal-home");
   const $click_me = $('#click-me');

   if($modal_home.length && $click_me.length){
       $click_me.on("click",function(){
           $modal_home.modal('show');
       })
   }
});