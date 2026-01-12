import { motion, Variants } from "framer-motion";
import Other1 from "../../../../../../public/images/others/1.jpg";
import Other2 from "../../../../../../public/images/others/2.jpg";
import Other3 from "../../../../../../public/images/others/3.jpg";
import { cn } from "@/lib/utils";

const cards = [
    {
        title: "Our Vision",
        text: "Opol Community College envisions to be an advanced institution through digital innovation, empowering leaders, and shaping entrepreneurs.",
        img: Other1,
        reverse: false,
    },
    {
        title: "Our Mission",
        text: "Opol Community College is dedicated to producing competitive graduates through advanced pedagogies, research, and innovation.",
        img: Other2,
        reverse: true,
    },
    {
        title: "Our Goals",
        text: `Imbued with its Vision and Mission, the OCC aspires to:
        • Become a digitally driven educational institution in teaching and innovation;
        • Engage students in research-based instruction aimed at enhancing competitiveness; and
        • Participate in and support programs that develop leadership and entrepreneurship skills.`,
        img: Other3,
        reverse: false,
    },
];

const cardVariants: Variants = {
    hidden: { opacity: 0, y: 50 },
    visible: {
        opacity: 1,
        y: 0,
        transition: { duration: 0.7, ease: [0.16, 1, 0.3, 1] },
    },
};

export default function VisionMission() {
    return (
        <section className="max-w-6xl mx-auto">
            <div className="mx-4 md:mx-6 space-y-4 md:space-y-8">
                {cards.map((card, index) => (
                    <motion.div
                        key={index}
                        initial="hidden"
                        whileInView="visible"
                        viewport={{ once: true, amount: 0.2 }}
                        variants={cardVariants}
                        className={cn(
                            "md:h-80 flex shadow-2xl border border-slate-100 overflow-hidden max-md:flex-col",
                            card.reverse && "flex-row-reverse"
                        )}
                    >
                        <div className="group flex relative flex-1 overflow-hidden">
                            <img
                                src={card.img}
                                className="md:size-full max-md:h-40 max-md:w-full object-cover transform transition duration-700 ease-in-out group-hover:scale-125 group-hover:-rotate-2"
                            />
                            <div className="absolute inset-0 bg-blue-700/30 flex items-center justify-center">
                                <h1 className="font-semibold text-3xl text-white">
                                    {card.title}
                                </h1>
                            </div>
                        </div>
                        <div className="flex-1 flex flex-col justify-center gap-8 p-6">
                            <div className="h-0.5 w-10 bg-blue-700"></div>
                            <p className="font-medium text-gray-600 whitespace-break-spaces">
                                {card.text}
                            </p>
                        </div>
                    </motion.div>
                ))}
            </div>
        </section>
    );
}
