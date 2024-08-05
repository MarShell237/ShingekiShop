export default function helpers(){
  function formatteNombre(nombre) {
    const regex = /(\d)(?=(?:\d{3})+$)/g;
    return nombre.toString().replace(regex, '$1 ');
  }

  return {
    formatteNombre,
  }
}