import Icon1 from "../../../../../../public/images/icons/feature-icon-1.svg";
import Icon2 from "../../../../../../public/images/icons/feature-icon-2.svg";
import { MoveRight } from "lucide-react";
import { motion, Variants } from "framer-motion";

const items = [
    {
        bg: "#FFF6F8",
        icon: Icon1,
        title: "College Life",
        description:
            "Enjoy a vibrant campus life filled with activities, friendships, and meaningful experiences every day.",
    },
    {
        bg: "#EEF1F4",
        icon: Icon2,
        title: "Research",
        description:
            "Explore new ideas and innovations through hands-on research that inspires discovery and growth.",
    },
    {
        bg: "#F3F0F8",
        icon: Icon1,
        title: "Athletics",
        description:
            "Show your school spirit and teamwork through exciting sports programs and athletic achievements.",
    },
    {
        bg: "#F0FFF6",
        icon: Icon2,
        title: "Academics",
        description:
            "Pursue academic excellence through quality education, dedicated mentors, and modern learning opportunities.",
    },
];

export default function Feature() {
    const cardVariants: Variants = {
        hidden: {
            opacity: 0,
            y: 40,
        },
        visible: (index: number) => ({
            opacity: 1,
            y: 0,
            transition: {
                duration: 0.6,
                ease: "easeOut",
                delay: index * 0.15,
            },
        }),
    };

    return (
        <section className="max-w-6xl mx-auto relative">
            <div className="-mt-24 md:-mt-36 mx-4 md:mx-6">
                <div className="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
                    {items.map((item, index) => (
                        <motion.div
                            key={index}
                            variants={cardVariants}
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true, amount: 0.2 }}
                            custom={index}
                            className="flex flex-col p-6 space-y-8 shadow-2xl border border-slate-100"
                            style={{
                                backgroundColor: item.bg,
                            }}
                        >
                            <img
                                src={item.icon}
                                alt={item.title}
                                className="size-14"
                            />
                            <div className="flex-1 space-y-4">
                                <h1 className="text-2xl font-semibold">
                                    {item.title}
                                </h1>
                                <p className="text-gray-600 text-sm">
                                    {item.description}
                                </p>
                            </div>
                            <button
                                type="button"
                                className="w-full relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-800 px-5 py-3.5 tracking-wide transition-colors text-center cursor-pointer"
                            >
                                <span className="relative z-10 transition-colors duration-300 group-hover:text-white">
                                    Learn More
                                </span>
                                <MoveRight
                                    strokeWidth={1.5}
                                    className="relative z-10 transition-colors duration-300 group-hover:text-white"
                                />
                                <span className="absolute left-0 top-0 h-full w-0 bg-slate-800 transition-all duration-500 ease-out group-hover:w-full"></span>
                            </button>
                        </motion.div>
                    ))}
                </div>
            </div>
        </section>
    );
}
