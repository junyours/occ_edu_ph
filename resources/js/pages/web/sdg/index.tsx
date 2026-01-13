import WebLayout from "@/layouts/web-layout";
import { ReactPortal } from "react";
import BgSDG from "../../../../../public/images/sdg/bg.svg";
import { Link, usePage } from "@inertiajs/react";
import { PageProps } from "@/types";
import Sdg0 from "../../../../../public/images/sdg/0.png";

interface Sdg {
    name: string;
    image: string;
}

interface Props extends PageProps {
    sdgs: Sdg[];
}

export default function SDG() {
    const { sdgs } = usePage<Props>().props;

    return (
        <>
            <div className="relative h-56 md:h-96 flex bg-gradient-to-b from-blue-500/70 via-sky-400/60 to-cyan-300/0">
                <div className="absolute inset-0 max-w-6xl mx-auto flex px-4 md:px-6">
                    <div className="flex-1 flex items-center">
                        <h1 className="text-xl md:text-4xl font-extrabold uppercase text-white">
                            Sustainable Development Goals
                        </h1>
                    </div>
                    <div className="flex-1"></div>
                </div>
                <div className="flex-1"></div>
                <div className="flex-1 flex items-center justify-center">
                    <div className="size-24 md:size-60">
                        <img
                            src={BgSDG}
                            className="size-fit object-contain animate-spin [animation-duration:16s]"
                        />
                    </div>
                </div>
            </div>
            <div className="max-w-6xl mx-auto px-4 md:px-6 space-y-10 md:space-y-20">
                <div className="grid grid-cols-4 md:grid-cols-6 gap-4">
                    {sdgs.map((sdg) => (
                        <Link
                            key={sdg.name}
                            href={route("sdg.news", sdg.name)}
                            className="transition duration-300 hover:scale-105"
                        >
                            <img
                                src={`https://lh3.googleusercontent.com/d/${sdg.image}`}
                                className="object-contain shadow-2xl"
                            />
                        </Link>
                    ))}
                    <Link
                        href={route("news")}
                        className="transition duration-300 hover:scale-105"
                    >
                        <img src={Sdg0} className="object-contain shadow-2xl" />
                    </Link>
                </div>
                <div className="w-full h-[400px] md:h-[550px]">
                    <iframe
                        width="100%"
                        height="100%"
                        src="https://www.youtube.com/embed/0XTBYMfZyrM?si=52P5xFl75e3f3yCh"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerPolicy="strict-origin-when-cross-origin"
                        allowFullScreen
                    ></iframe>
                </div>
            </div>
        </>
    );
}

SDG.layout = (page: ReactPortal) => <WebLayout children={page} />;
