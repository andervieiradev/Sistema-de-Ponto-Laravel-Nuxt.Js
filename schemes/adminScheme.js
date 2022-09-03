import { LocalScheme } from '~auth/runtime'

export default class CustomScheme extends LocalScheme {

  // Override `fetchUser` method of `local` scheme
  // eslint-disable-next-line require-await
  async fetchUser (endpoint, store) {
    // Token is required but not available
    if (!this.check().valid) {
      return
    }

    // User endpoint is disabled.
    if (!this.options.endpoints.user) {
      this.$auth.setUser({})
      return
    }

    // Try to fetch user and then set
    return this.$auth.requestWith(
      this.name,
      endpoint,
      this.options.endpoints.user
    ).then((response) => {

      // eslint-disable-next-line no-undef
      // const user = getProp(response.data, this.options.user.property)


      // Transform the user object
      const customUser = {
        ...response.data.user,
        scope: ['admin']
      }

      this.$auth.setUser(customUser)

      return response
    }).catch((error) => {
      this.$auth.callOnError(error, { method: 'fetchUser' })
    })
  }
}
