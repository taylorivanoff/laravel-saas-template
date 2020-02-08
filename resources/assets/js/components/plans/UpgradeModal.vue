<template>
	<div class="container  col-md-9 my-5 pt-2">
        <p class="h6 font-weight-bold text-center">Upgrade to {{ plan.name }}</p>

        <form v-on:submit.prevent>
            <div class="form-group row my-4">
                <div class="custom-control custom-radio">
                    <input type="radio" name="plan-slug" class="custom-control-input pr-4" required checked>

                    <label class="ml-4 custom-control-label"><small>${{ plan.price }} /mo <strong>paid monthly</strong><br><span class="text-secondary">${{ plan.price }} due today</span></small></label>
                </div>
            </div>

	        <card class="stripe-card"
	            :class='{ complete }'
	            :stripe='this.plan.stripe_public_key' 
	            :options='stripeOptions'
	            @change='complete = $event.complete'
	        />

			<div class="row mt-4">
		        <div class="col">
		        	<button
                        class='btn btn-block btn-primary' 
                        @click='pay'
                        :disabled='!complete || isLoading'
                        type="button"
                    >
                        
                        <span :class="{ 'spinner-border spinner-border-sm mb-1': isLoading }" role="status" aria-hidden="true"></span>
                        Upgrade
                    </button>
		        </div>
		        <div class="col">
		            <button type="button" class="btn btn-block" @click="$emit('close')">Cancel</button>
		        </div>
	        </div>
        </form>
	</div>
</template>

<script>
	import { Card, handleCardSetup } from 'vue-stripe-elements-plus'

	export default {
		props: [
			'plan'
		],

		data: function () {
			return {
                isLoading: false,
				complete: false,
                stripeOptions: {
                    hidePostalCode: true,
                    style: {
                        base: {
                          fontWeight: 500,
                          fontFamily: 'Nunito Sans, Roboto, Open Sans, Segoe UI, sans-serif',
                          fontSize: '16px',
                          fontSmoothing: 'antialiased',
                        },
                    }
                }
			}
		},

        components: { Card },

        mounted () {
        },

		methods: {
			pay () {
                this.isLoading = true;

                handleCardSetup(this.plan.intent.client_secret).then((data) => {
                	axios.post(this.plan.route, {
                        plan: this.plan.gateway_id,
                        payment_method: data.setupIntent.payment_method,
                    }).then((response) => {
                        if (response.data.success) {
                            window.location.assign(response.data.redirect_url);
                        } else {
                            console.log(response)
                        }
                    })
                })
            }
		},
	}
</script>

<style>
    .stripe-card {
        color: #222;
        padding: 0.8rem;
        border: 1px solid #d8d8d8;
        border-radius: 4px;
    }

    .stripe-card.complete {
        border-color: #7fcd91;
    }
</style>