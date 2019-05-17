
export default {
    template: `
      <div>
       <h1>Single-file JavaScript Component</h1>
       <p>{{ message }}</p>
      </div>
    `,
    data() {
      return {
        message: 'Oh hai from the component'
      }
    }
}

/*
export default {
	data() {
		return { 
      checked: false, 
      title: 'Check me' 
    }
	},
	methods: {
		check() { this.checked = !this.checked; }
	},
	render() {
		return  <div>
		         <div></div>
		         <div>{ this.title }</div>
		       </div>
	}
}
*/