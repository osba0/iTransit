<template>
  <div>
    <div class="text-center">
      <div class="title mb-4">
        {{ title }}
      </div>
    </div>
    <template v-if="!authenticated">
      <div>
        <div class="col-lg-8 m-auto">
          <card :title="$t('login')">
              <form @submit.prevent="login" @keydown="form.onKeydown($event)">
              <!-- Email -->
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
                <div class="col-md-7">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
                  <has-error :form="form" field="email" />
                </div>
              </div>

              <!-- Password -->
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
                <div class="col-md-7">
                  <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
                  <has-error :form="form" field="password" />
                </div>
              </div>

              <!-- Remember Me -->
              <div class="form-group row">
                <div class="col-md-3" />
                <div class="col-md-7">
                  <checkbox v-model="remember" name="remember">
                    {{ $t('remember_me') }}
                  </checkbox>
                  
                  <router-link :to="{ name: 'password.request' }" class="small ml-auto my-auto">
                    {{ $t('forgot_password') }}
                  </router-link>

                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-7 offset-md-3 d-flex">
                  <!-- Submit Button -->
                  <v-button :loading="form.busy">
                    {{ $t('login') }}
                  </v-button>
                </div>
              </div>
            </form>
          </card>
        </div>
      </div>
      </template>
  </div>
</template>


<script>
import Form from 'vform'
import Cookies from 'js-cookie'
import { mapGetters } from 'vuex'


export default {
  //layout: 'basic',

  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    title: window.config.appName,
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),

  computed: mapGetters({
    authenticated: 'auth/check'
  }),

  methods: {
    async login () {
      // Submit the form.
      const { data } = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.redirect()
    },

    redirect () {
      const intendedUrl = Cookies.get('intended_url')

      if (intendedUrl) {
        Cookies.remove('intended_url')
        this.$router.push({ path: intendedUrl })
      } else {
        this.$router.push({ name: 'home' })
      }
    }
  }
}
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 60px;
}
</style>
