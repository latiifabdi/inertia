<template>
    <span
      aria-busy="true"
    >
      <span
        class="Spinner BigSpinner"
        aria-hidden="true"
      >🌀</span>
    </span>
</template>


<script>
    export default {

    }
</script>

<style>
    .Spinner {
      display: inline-block;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      from { transform: rotateZ(0deg); }
      to { transform: rotateZ(360deg); }
    }

    .BigSpinner {
      font-size: 50px;
      width: 50px;
      height: 50px;
    }
</style>
