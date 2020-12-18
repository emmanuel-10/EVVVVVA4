new Vue({
el:'#app',
data:{
    rut: "",
    url: "http://localhost/evaluacion4/",
    cliente: {},
      esta: false,
      id_armazon: "",
      id_tipo_cristal: "",
      id_material_cristal: "",
     
      materiales: [],
      armazones: [],
      tipos: [],
      
      rutClienteSeleccionado:"",
      tipo_lentes:'',
      i_esfera:'',
      i_cilindro:'',
      i_eje:'',
      d_esfera:'',
      d_cilindro:'',
      d_eje:'',
      base_sel:'',
      prisma:'',
      fecha_e:'',
      fecha_r:'',
      nom_med:'',
      rut_med:'',
      observacion:'',
      valor:'',
      distancia_p:'',
      fecha_en:'',
      fecha_re:'',
},
methods:{
    buscar: async function(){
        var recurso = "controllers/BuscarCliente.php";
        var form = new FormData();
        form.append("rut", this.rut);
        try {
            const res = await fetch(this.url + recurso, {
              method: "post",
              body: form
            });
            const data = await res.json();
            console.log(data);
            if (data == null) {
              M.toast({ html: "rut no encontrado" });
              this.esta = false;
              this.cliente = {};
            } else {
              this.cliente = data;
              this.esta = true;
              this.rutClienteSeleccionado = this.rut;
            }
        } catch (error) {
            console.log(error);
          }
        },
        
        cargaMateriales: async function () {
          try {
            var recurso = "controllers/MaterialCristal.php";
            const res = await fetch(this.url + recurso);
            const data = await res.json();
            this.materiales = data;
            console.log(data);
          } catch (error) {
            console.log(error);
          }
        },
        cargaTipos: async function () {
          try {
            var recurso = "controllers/TipoCristal.php";
            const res = await fetch(this.url + recurso);
            const data = await res.json();
            this.tipos = data;
            console.log(data);
          } catch (error) {
            console.log(error);
          }
        },
        cargaArmazones: async function () {
          try {
            var recurso = "controllers/Armazon.php";
            const res = await fetch(this.url + recurso);
            const data = await res.json();
            this.armazones = data;
            console.log(data);
          } catch (error) {
            console.log(error);
          }
        },
        crearReceta: async function () {
          if (this.rutClienteSeleccionado != ""){
            this.fecha_e = M.Datepicker.getInstance(fecha_entrega);
            this.fecha_r = M.Datepicker.getInstance(fecha_retiro);
            const recurso = "controllers/InsertarReceta.php";
            var form = new FormData();
            form.append("tipo_lente", this.tipo_lentes);
            form.append("esfera_oi", this.i_esfera);
            form.append("esfera_od", this.d_esfera);
            form.append("cilindro_oi", this.i_cilindro);
            form.append("cilindro_od", this.d_cilindro);
            form.append("eje_oi", this.i_eje);
            form.append("eje_od", this.d_eje);
            form.append("prisma", this.prisma);
            form.append("base", this.base_sel);
            form.append("armazon", this.id_armazon);
            form.append("material_cristal", this.id_material_cristal);
            form.append("tipo_cristal", this.id_tipo_cristal);
            form.append("distancia_pupilar", this.distancia_p);
            form.append("valor_lente", this.valor);
            form.append("fecha_entrega", this.fecha_e);
            form.append("fecha_retiro", this.fecha_r);
            form.append("observacion", this.observacion);
            form.append("rut_cliente", this.rutClienteSeleccionado);
            form.append("rut_medico", this.rut_med);
            form.append("nombre_medico", this.nom_med);
            try {
                const res = await fetch(this.url + recurso, {
                method: "post",
                body: form,
              });
              const data = await res.json();
                for (i in data) {
                M.toast({html: data[i]})
                
                if (data["msg"] == "receta creada") {
                  this.tipo_lentes = ""; 
                  this.i_esfera = "";
                  this.d_esfera = "";
                  this.i_cilindro = "";
                  this.d_cilindro = "";
                  this.i_eje = "";
                  this.d_eje = "";
                  this.prisma = "";
                  this.base_sel = "";
                  this.id_armazon = ""; 
                  this.id_material_cristal = "";
                  this.id_tipo_cristal = "";
                  this.distancia_p = "";
                  this.valor = "";
                  this.observacion = "";
                  this.rut_med = "";
                  this.nom_med = "";
                }
              }                       
            } catch (error) {
                console.log(error);
                M.toast({html: 'Hubo un error'});
            }  
          } else {
            M.toast({html: 'Selecciona un Cliente'});
          }
  
        }
      },
      created() {
        this.cargaMateriales();
        this.cargaTipos();
        this.cargaArmazones();
      },
    });