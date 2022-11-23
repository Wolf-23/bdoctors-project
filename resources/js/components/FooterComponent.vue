<template>
    <div class="myFooter py-2">
      <p>Powered By:</p>
      <p class="bigText">DIVISIONE 1</p>
      <p class="biggerText">THE BLANKET TEAM</p>
      
      <span> &lt; Alessio Maria Scoppetta  •  Riccardo Lupinu  •  Erik Borgogno  •  Marco Paci  •  Davide Capoccia  /> </span>
    </div>
  </template>
  
  <script>
  export default {
      name: 'FooterComponent'
  }
  </script>
  
  <style scoped lang="scss">
      .myFooter{
          background-color: #094067;
          width: 100%;
          text-align: center;
          color: rgb(203, 231, 255);
          position: sticky;
          z-index: 2;
      }
      .bigText{font-size:20px}
      .biggerText{
          font-size:30px;
          color:#ef4565;
      }
  
  
  </style> 