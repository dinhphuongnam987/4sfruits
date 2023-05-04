<template>
    <div>
        <TheHeader />
        <Search />
        <client-only>
            <notifications group="foo" />
        </client-only>
        <Nuxt />
        <BrandList />
        <TheFooter />
        <TheCoppyRight />
    </div>
</template>