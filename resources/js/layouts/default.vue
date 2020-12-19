<template>
  <div class="flex items-center">
    <navbar />

    <div class="container mx-auto w-5/6">
      <child />
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'MainLayout',

  components: {
    Navbar
  }
}
</script>
