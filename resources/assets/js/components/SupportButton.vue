<template>	
	<div>
		<a @click="$modal.show('book-reading')">
			<button type="button" class="nav-link btn btn-static-primary btn-shadow">
				Read Book
			</button>
		</a>

		<modal name="book-reading" height="auto" width="70%">
			<div class="container">					
				<div class="card text-center" v-for="book in statuses">
				  <h1 class="card-header" v-text="book.title"></h1>
				  <div class="card-body">
				    <p class="card-text awesome_font" style="text-align:justify;" v-text="book.body"></p>
				  </div>
				  <div class="card-footer text-muted">
				    k ho k
				  </div>
				</div>
			</div>
		</modal>
</div>
</template>

<script>
	export default {
		 props: ['attributes'],
		data(){
			return{
				statuses: []
			}
		},

		created(){			
			axios.get('/statuses/' +this.attributes.id )
				.then(({data}) => this.statuses = data);
				//.then(response => this.statuses = response.data);
		}
	}
</script>