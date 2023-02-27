<template>
<div class="">
   <div>
  
     <div>
     <p>Phone: {{ $data }}</p>
     </div>

   </div>
</div>
</template>
<script>
export default {
    props: {
        data: {
            type: Object,
            required: true
        }
    }
}
</script>