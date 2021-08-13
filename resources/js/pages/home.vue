<template>
  <div>
    <h2>Dry</h2>
    <card :title="$t('home')">
      {{ $t('you_are_logged_in') }}
    </card>
  </div>
</template>

<script>
export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
