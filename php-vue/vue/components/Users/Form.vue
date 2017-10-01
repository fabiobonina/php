{
  props: {
   user: {
     required: true,
     type: Object,
     // http://vuejs.org/guide/components.html#Prop-Validation
     coerce(val) {
       return JSON.parse(val) // cast the value to Object
     }
   }
  }
}