window.addEventListener("load", () => {
  let cookies = document.querySelector("#cookies");
  let boton_cookies = document.querySelector("#boton-cookies");
  let oscuridad = document.querySelector(".oscuro");
  boton_cookies.addEventListener("click", () => {
    cookies.classList.add("d-none");
    oscuridad.classList.add("d-none");
  });
});
