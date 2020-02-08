<template>
	<div class="col-md-6 mb-4">
	    <div class="card text-center mr-1">
	        <p class="h5 pt-5 pb-2">{{ plan.name }}</p>

	        <p class="mt-4">
	            <button
	                class="btn btn-primary"
	                type="button"
	                @click="showModal"
	            >
	                Choose {{ plan.name }}
	            </button>
	        </p>

	        <p class="my-4">
	            starting at ${{ plan.price }}/month
	            <br>
	            <span class="text-secondary">Price in AUD</span>
	        </p>

	        <ul class="col-6 mx-auto text-left mb-5">
	            <li>JSON</li>
	            <li>List</li>
	            <li>Features</li>
	        </ul>
	    </div>
	</div>
</template>

<script>
	import UpgradeModal from './UpgradeModal.vue'

	export default {
		props: [
			'plan'
		],
		methods: {
			showModal () {
				this.$modal.show(UpgradeModal, {
				  	plan: this.plan
				}, {
  					height: 'auto',
                	adaptive: true
				})
			}
		}
	}
</script>