<template>
  <!-- bidirectional data binding（双向数据绑定） -->
  <div class="quill-editor" 
       v-model="content" >
  </div>

</template>

<script>
  export default {

    data: function() {

        return {
          content: null,
        }
    },

    mounted() {
      console.log('this is current quill instance object', this.myQuillEditor)
    }
    // Omit the same parts as in the following component sample code
    // ...
  }
</script>