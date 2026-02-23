import THE from "../../../../../../public/images/the.png";
import AD from "../../../../../../public/images/ad.jpg";
import SDG from "../../../../../../public/images/sdg/bg.svg";

const images = [THE, AD, SDG];

export default function Partner() {
    return (
        <section className="md:block hidden max-w-6xl mx-auto">
            <div className="mx-4 md:mx-6 flex items-center justify-center gap-12">
                {images.map((image, index) => (
                    <img
                        key={index}
                        src={image}
                        className="h-20 object-contain"
                    />
                ))}
            </div>
        </section>
    );
}
