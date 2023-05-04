<template>
  	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Have you any question?</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est, assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse natus!</p>
					</div>
					<div class="contact-form">
						<form id="fruitkha-contact">
							<p>
								<input type="text" placeholder="Name" :value="info.name" @blur="getName($event)">
								<small v-if="error.name.length > 0" style="color: red"> {{ error.name }}</small>

								<input type="email" placeholder="Email" :value="info.email" @blur="getEmail($event)">
								<small v-if="error.email.length > 0" style="color: red"> {{ error.email }}</small>
							</p>
							<p>
								<input type="tel" placeholder="Phone" :value="info.phone" @blur="getPhone($event)">
								<small v-if="error.phone.length > 0" style="color: red"> {{ error.phone }}</small>

								<input type="text" placeholder="Address" :value="info.address" @blur="getAddress($event)">
								<small v-if="error.address.length > 0" style="color: red"> {{ error.address }}</small>
							</p>
							<p>
								<textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something" :value="info.description" @blur="getDescription($event)"></textarea>
								<small v-if="error.description.length > 0" style="color: red"> {{ error.description }}</small>
							</p>
							<p><input type="button" id="btn-contact" value="Submit" @click="sendContact()"></p>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Shop Address</h4>
							<p>34/8, East Hukupara <br> Gifirtok, Sadan. <br> Country Name</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Shop Hours</h4>
							<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: +00 111 222 3333 <br> Email: support@fruitkha.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->
</template>

<script>
export default {
	data() {
		return {
            error: {
                name: '',
                email: '',
                address: '',
                phone: '',
                description: ''
            },
            info: {
                name: '',
                email: '',
                address: '',
                phone: null,
                description: '',
            },
		}
	},
    methods: {
        getName($event) {
            let name = $event.target.value
            let regex = /^[a-zA-Z ]{2,30}$/;
            if(!(name.length > 0)) {
                this.error.name = 'Your name is empty. Please re-enter name.'
            } else if(regex.test(name) == false) {
                this.error.name = 'Please enter a correct name format.'
            } else {
                this.error.name = false
            }
            this.info.name = name
        },
        getEmail($event) {
            let email = $event.target.value
            let regex = /\S+@\S+\.\S+/;
            if(!(email.length > 0)) {
                this.error.email = 'Your email is empty. Please re-enter email.'
            } else if(regex.test(email) == false) {
                this.error.email = 'Please enter a correct email format.'
            } else {
                this.error.email = false
            }
            this.info.email = email
        },
        getAddress($event) {
            let address = $event.target.value
            let regex = /^[a-z0-9\s,'-]*$/i
            if(!(address.length > 0)) {
                this.error.address = 'Your address is empty. Please re-enter address.'
            } else if(regex.test(address) == false) {
                this.error.address = 'Please enter a correct address format.'
            } else {
                this.error.address = false
            }
            this.info.address = address
        },
        getPhone($event) {
            let phone = $event.target.value
            let regex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/
            if(!(phone.length > 0)) {
                this.error.phone = 'Your phone is empty. Please re-enter phone.'
            } else if(regex.test(phone) == false) {
                this.error.phone = 'Please enter a correct phone format.'
            } else {
                this.error.phone = false
            }
            this.info.phone = phone
        },
        getDescription($event) {
            let description = $event.target.value
            let regex = /^[a-z0-9\s,'-]*$/i
            if(!(description.length > 0)) {
                this.error.description = 'Your description is empty. Please re-enter description.'
            } else if(regex.test(description) == false) {
                this.error.description = 'Please enter a correct description format.'
            } else {
                this.error.description = false
            }
            this.info.description = description
        },
        sendContact() {
            if(this.error.name !== false) {
                this.error.name = 'Please fill in the information and enter a correct name format'
            }
            if(this.error.email !== false) {
                this.error.email = 'Please fill in the information and enter a correct email format'
            }
            if(this.error.address !== false) {
                this.error.address = 'Please fill in the information and enter a correct address format'
            }
            if(this.error.phone !== false) {
                this.error.phone = 'Please fill in the information and enter a correct phone format'
            }
            if(this.error.description !== false) {
                this.error.description = 'Please fill in the information and enter a correct description format'
            }

            if
            (
                this.error.name == false 
                && this.error.email == false
                && this.error.address == false
                && this.error.phone == false
                && this.error.description == false
            ) 
            {
                this.$router.push({name: 'thank-you'})
            }
        },
    },
}
</script>

<style>
	#btn-contact {
		background-color: #F28123;
		color: #051922;
		font-weight: 700;
		text-transform: uppercase;
		font-size: 15px;
		border: none !important;
		cursor: pointer;
		padding: 15px 25px;
		border-radius: 30px;
	}
</style>