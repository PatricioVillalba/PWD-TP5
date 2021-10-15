/* Trabajo Practico n4 */
$("#nuevaPersona").bootstrapValidator({
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fas fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    NroDni: {
      validators: {
        notEmpty: {
          message: "ingrese un numero dni",
        },
        regexp: {
          regexp: /^[0-9]+$/,
          message: "Ingrese una cadena válida",
        },
      },
    },
    Apellido: {
      validators: {
        notEmpty: {
          message: "Ingrese Apellido",
        },
        regexp: {
          regexp: /^[a-zA-Z]+$/,
          message: "Ingrese una cadena válida",
        },
      },
    },
    Nombre: {
      validators: {
        notEmpty: {
          message: "ingrese un nombre",
        },
        regexp: {
          regexp: /^[a-zA-Z]+$/,
          message: "Ingrese una cadena válida",
        },
      },
    },
    fechaNac: {
      validators: {
        notEmpty: {
          message: "ingrese un nombre",
        },
        
      },
    },
    Telefono: {
      validators: {
        notEmpty: {
          message: "ingrese un numero telefonico",
        },
        regexp: {
          regexp: /[0-9]{3}-[0-9]{7}/,
          message: "Ingrese una cadena válida",
        },
      },
    },
    Domicilio: {
      validators: {
        notEmpty: {
          message: "ingrese un Domicilio",
        },
        
      },
    },
  },
});
$("#nuevoAuto").bootstrapValidator({
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fas fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    Patente:{
      validators: {
        notEmpty: {
          message: "ingrese una Patente",
        },
        /* regexp: {
          regexp: /[a-zA-Z]{3}[0-9]{3}/,
          message: "Ingrese una cadena válida",
        }, */
      },
    },
    Marca: {
      validators: {
        notEmpty: {
          message: "ingrese una Marca",
        },
        
      },
    },
    Modelo: {
      validators: {
        notEmpty: {
          message: "ingrese Modelo",
        },
        
      },
    },
    DniDuenio: {
      validators: {
        notEmpty: {
          message: "ingrese Dni del Due&ntilde;o",
        },
        regexp: {
          regexp: /^[0-9]+$/,
          message: "Ingrese una cadena válida",
        },
        
      },
    },
  },
});
$("#buscarPersona").bootstrapValidator({
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fas fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    NroDni: {
      validators: {
        notEmpty: {
          message: "ingrese un numero dni",
        },
        regexp: {
          regexp: /^[0-9]+$/,
          message: "Ingrese una cadena válida",
        },
      },
    },
  },
});
$("#buscarAuto").bootstrapValidator({
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fas fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    Patente: {
      validators: {
        notEmpty: {
          message: "Ingrese Patente",
        },
      },
    },
  },
});
$("#cambioDuenio").bootstrapValidator({
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fas fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    Patente: {
      validators: {
        notEmpty: {
          message: "Ingrese Patente",
        },
      },
    },
    NroDni: {
      validators: {
        notEmpty: {
          message: "ingrese un numero dni",
        },
        regexp: {
          regexp: /^[0-9]+$/,
          message: "Ingrese una cadena válida",
        },
      },
    },
  },
});