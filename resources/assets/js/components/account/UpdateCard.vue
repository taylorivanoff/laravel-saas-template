<template>
    <div>
        <button 
            class='btn btn-primary' 
            @click='update'
            type="button"
        >
            Update Card
        </button>
	</div>
</template>

<script>
    import UpdateCardModal from './UpdateCardModal.vue'

	export default {
		props: [
			'stripe',
            'route'
		],

        mounted () {
        },

		methods: {
			update () {
                this.$modal.show(UpdateCardModal, {
                    stripe: this.stripe,
                    route: this.route
                }, {
                    height: 'auto',
                    adaptive: true
                })
            }
		},
	}
</script>
