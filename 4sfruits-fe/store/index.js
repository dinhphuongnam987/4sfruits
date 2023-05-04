
export const actions = {
    async nuxtServerInit({ dispatch }) {
        await Promise.all([
            dispatch('menu/actGetMenuList'),
            dispatch('brand/actGetBrand'),
            dispatch('header/actGetHeaderLogo'),
          ]
        )
      }
}