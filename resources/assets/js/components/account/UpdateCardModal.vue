<template>
    <div class="container col-md-9 my-5 pt-2">
        <p class="h6 font-weight-bold text-center">Update payment method</p>

        <form v-on:submit.prevent class="mt-4">
            <card class="stripe-card"
                :class='{ complete }'
                :stripe='this.stripe' 
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
                        Update
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
	import { Card, createPaymentMethod } from 'vue-stripe-elements-plus'

	export default {
		props: [
            'stripe',
            'route',
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

                createPaymentMethod('card').then((data) => {
                    axios.post(this.route, {
                        payment_method: data.paymentMethod.id,
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