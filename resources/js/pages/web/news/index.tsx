import WebLayout from "@/layouts/web-layout";
import { Link, router, usePage } from "@inertiajs/react";
import { ReactPortal } from "react";
import {
    Carousel,
    CarouselContent,
    CarouselItem,
} from "@/components/ui/carousel";
import Autoplay from "embla-carousel-autoplay";
import { PageProps } from "@/types";
import { Input } from "@/components/ui/input";
import { debounce } from "lodash";
import { MoveRight } from "lucide-react";
import { motion, Variants } from "framer-motion";

interface Image {
    image: string;
}

interface Sdg {
    id: number;
    image: string;
}

interface News {
    id: number;
    hash_id: string;
    title: string;
    description: string;
    date: Date;
    image: string;
    sdg: Sdg[];
}

interface Props extends PageProps {
    news: News[];
    images: Image[];
    count: number;
    search: string | undefined;
}

export default function News() {
    const { news, count, search, images } = usePage<Props>().props;

    const handleSearch = debounce((value: string) => {
        router.get(
            "/news",
            { search: value },
            {
                preserveState: true,
                preserveScroll: true,
                replace: true,
            }
        );
    }, 1000);

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
        <>
            <div className="relative h-56 md:h-96 flex bg-gradient-to-b from-blue-500/70 via-sky-400/60 to-cyan-300/0">
                <div className="absolute inset-0 max-w-6xl mx-auto flex px-4 md:px-6">
                    <div className="flex-1 flex items-center">
                        <h1 className="text-xl md:text-4xl font-extrabold uppercase text-white">
                            Latest News & Updates
                        </h1>
                    </div>
                    <div className="flex-1"></div>
                </div>
                <div className="flex-1"></div>
                <div className="flex-1 overflow-hidden [clip-path:polygon(50%_0%,100%_0%,100%_100%,0%_100%)]">
                    <Carousel
                        opts={{
                            loop: true,
                        }}
                        plugins={[
                            Autoplay({
                                delay: 3000,
                            }),
                        ]}
                        className="relative size-full"
                    >
                        <CarouselContent className="absolute inset-0 m-0">
                            {images.map((image, index) => (
                                <CarouselItem
                                    key={index}
                                    className="size-full p-0"
                                >
                                    <img
                                        src={`https://lh3.googleusercontent.com/d/${image}`}
                                        className="object-cover size-full"
                                    />
                                </CarouselItem>
                            ))}
                        </CarouselContent>
                    </Carousel>
                </div>
            </div>
            <div className="max-w-6xl mx-auto p-4 md:p-6 space-y-8">
                <div className="flex md:items-center md:justify-between max-md:gap-4 max-md:flex-col-reverse">
                    <div className="w-fit bg-gray-100 py-2 px-3 text-sm">
                        <h1 className="space-x-1.5">
                            <span className="font-semibold text-blue-700">
                                {count}
                            </span>
                            <span className="text-gray-600">
                                articles found
                            </span>
                        </h1>
                    </div>
                    <Input
                        defaultValue={search}
                        onChange={(e) => handleSearch(e.target.value)}
                        className="w-full md:max-w-sm rounded-none"
                        placeholder="Search news and articles..."
                        type="search"
                    />
                </div>
                <div className="grid sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                    {news.map((item, index) => (
                        <motion.div
                            key={item.id}
                            custom={index}
                            variants={cardVariants}
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true, amount: 0.2 }}
                            className="flex flex-col shadow-2xl border border-slate-100 will-change-transform"
                        >
                            <div className="group h-44 md:h-56 overflow-hidden relative">
                                <img
                                    src={`https://lh3.googleusercontent.com/d/${item.image}`}
                                    className="size-full object-cover transform transition duration-700 ease-in-out group-hover:scale-125 group-hover:-rotate-2"
                                />
                                <div className="absolute top-4 left-4 bg-blue-700 flex flex-col items-center shadow-2xl border border-slate-100">
                                    <h1 className="font-semibold text-2xl text-white p-2">
                                        {new Date(item.date).getDate()}
                                    </h1>
                                    <p className="font-medium text-xs bg-white p-1">
                                        {new Date(item.date).toLocaleString(
                                            "en-US",
                                            { month: "short" }
                                        )}
                                        , {new Date(item.date).getFullYear()}
                                    </p>
                                </div>
                            </div>
                            <div className="flex-1 p-6 flex flex-col gap-6">
                                <div className="flex-1 space-y-4">
                                    <div className="flex items-center gap-1.5 flex-wrap">
                                        <div className="grid grid-cols-8 gap-2">
                                            {item.sdg.map((sdg) => (
                                                <img
                                                    key={sdg.id}
                                                    src={`https://lh3.googleusercontent.com/d/${sdg.image}`}
                                                    className="object-contain"
                                                />
                                            ))}
                                        </div>
                                    </div>
                                    <h1 className="text-xl font-semibold line-clamp-1 md:line-clamp-2">
                                        {item.title}
                                    </h1>
                                    <p className="text-gray-600 line-clamp-2 md:line-clamp-3 text-sm">
                                        {item.description}
                                    </p>
                                </div>
                                <Link
                                    href={`/news/article/${item.hash_id}`}
                                    className="w-fit"
                                >
                                    <button
                                        type="button"
                                        className="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-800 px-5 py-3.5 tracking-wide transition-colors text-center cursor-pointer"
                                    >
                                        <span className="relative z-10 transition-colors duration-300 group-hover:text-white">
                                            Read More
                                        </span>
                                        <MoveRight
                                            className="relative z-10 transition-colors duration-300 group-hover:text-white"
                                            strokeWidth={1.5}
                                        />
                                        <span className="absolute left-0 top-0 h-full w-0 bg-slate-800 transition-all duration-500 ease-out group-hover:w-full"></span>
                                    </button>
                                </Link>
                            </div>
                        </motion.div>
                    ))}
                </div>
            </div>
        </>
    );
}

News.layout = (page: ReactPortal) => <WebLayout children={page} />;
