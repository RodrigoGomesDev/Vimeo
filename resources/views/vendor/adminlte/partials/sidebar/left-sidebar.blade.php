<style>  
    
    :root {
   --modal-duration: 1s;
   --modal-color: #428bca;
 }
 .card-primary.card-outline {
     border-top: 3px solid #007bff;
 }
 
 #modal-btn, #modal-btn2, #modal-btn3, #modal-btn-edit {
     cursor: pointer;
 }
 
 .modal, .modal2, .modal3, .modalBtn {
   display: none;
   position: fixed;
   z-index: 1;
   left: 0;
   top: 0;
   height: 100%;
   width: 100%;
   overflow: auto;
   background-color: rgba(0, 0, 0, 0.5);
 }
 
 @keyframes modalopen {
   from {
     opacity: 0;
   }
   to {
     opacity: 1;
   }
 }
 
 </style>