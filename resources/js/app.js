import "./bootstrap";
import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
import intersect from "@alpinejs/intersect";

Alpine.plugin(intersect);

Alpine.plugin(focus);

window.Alpine = Alpine;

Alpine.start();
