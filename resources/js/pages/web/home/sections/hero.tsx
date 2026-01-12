import { MoveRight } from "lucide-react";
import Video from "../../../../../../public/videos/promotional.mp4";

export default function Hero() {
    return (
        <section className="relative h-[400px] md:h-[600px] w-full overflow-hidden">
            <video
                className="size-full object-cover"
                autoPlay
                loop
                muted
                playsInline
            >
                <source src={Video} type="video/mp4" />
                Your browser does not support the video tag.
            </video>
            <div className="absolute inset-0 bg-black/50"></div>
            <div className="max-w-6xl mx-auto">
                <div className="absolute bottom-20 md:bottom-28 mx-4 md:mx-6 space-y-10 text-white">
                    <div className="relative flex flex-col gap-4 max-md:items-center max-md:text-center">
                        <h1 className="font-bold text-2xl md:text-3xl uppercase">
                            Welcome to
                        </h1>
                        <h2 className="font-bold text-3xl md:text-5xl uppercase">
                            Opol Community College
                        </h2>
                        <p className="md:text-lg">
                            Fueling ambition, advancing knowledge, and creating
                            opportunities for every learner.
                        </p>
                    </div>
                    <div className="hidden items-center gap-8 md:flex">
                        <button
                            type="button"
                            className="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap bg-blue-700 px-5 py-3.5 tracking-wide transition-colors text-center text-white cursor-pointer"
                        >
                            <span className="relative z-10 transition-colors duration-300 group-hover:text-slate-800">
                                Admission Now
                            </span>
                            <MoveRight
                                strokeWidth={1.5}
                                className="relative z-10 transition-colors duration-300 group-hover:text-slate-800"
                            />
                            <span className="absolute left-0 top-0 h-full w-0 bg-white transition-all duration-500 ease-out group-hover:w-full"></span>
                        </button>
                        <button
                            type="button"
                            className="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-white px-5 py-3.5 tracking-wide transition-colors text-center text-white cursor-pointer"
                        >
                            <span className="relative z-10 transition-colors duration-300 group-hover:text-slate-800">
                                View Program
                            </span>
                            <MoveRight
                                strokeWidth={1.5}
                                className="relative z-10 transition-colors duration-300 group-hover:text-slate-800"
                            />
                            <span className="absolute left-0 top-0 h-full w-0 bg-white transition-all duration-500 ease-out group-hover:w-full"></span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    );
}
