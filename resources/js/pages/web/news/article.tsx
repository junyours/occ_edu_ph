import { ImageZoom } from "@/components/ui/shadcn-io/image-zoom";
import WebLayout from "@/layouts/web-layout";
import { PageProps } from "@/types";
import { usePage } from "@inertiajs/react";
import { CalendarDays, MoveLeft } from "lucide-react";
import { ReactPortal } from "react";

interface Sdg {
    id: number;
    image: string;
}

interface Article {
    id: number;
    title: string;
    description: string;
    date: Date;
    image: string;
    sdg: Sdg[];
}

interface Props extends PageProps {
    article: Article;
}

export default function Article() {
    const { article } = usePage<Props>().props;

    return (
        <div className="md:pt-8">
            <div className="space-y-20 max-w-3xl mx-auto p-4 md:p-6">
                <div className="flex flex-col gap-4 md:gap-6">
                    <button
                        onClick={() => {
                            if (window.history.length > 1) {
                                window.history.back();
                            } else {
                                window.location.href = "/news";
                            }
                        }}
                        type="button"
                        className="w-fit relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-800 px-5 py-3.5 tracking-wide transition-colors text-center cursor-pointer"
                    >
                        <MoveLeft
                            strokeWidth={1.5}
                            className="relative z-10 transition-colors duration-300 group-hover:text-white"
                        />
                        <span className="relative z-10 transition-colors duration-300 group-hover:text-white">
                            Back to News
                        </span>
                        <span className="absolute left-0 top-0 h-full w-0 bg-slate-800 transition-all duration-500 ease-out group-hover:w-full"></span>
                    </button>
                    <div className="space-y-8 md:space-y-10">
                        <div className="space-y-6 md:space-y-8">
                            <h1 className="text-2xl font-semibold">
                                {article.title}
                            </h1>
                            <div className="flex items-center gap-2">
                                <CalendarDays strokeWidth={1.5} />
                                <span className="font-medium">
                                    {new Date(article.date).toLocaleDateString(
                                        "en-US",
                                        {
                                            month: "long",
                                            day: "numeric",
                                            year: "numeric",
                                        }
                                    )}
                                </span>
                            </div>
                            <div className="flex items-center gap-2 flex-wrap">
                                {article.sdg.map((sdg) => (
                                    <img
                                        key={sdg.id}
                                        src={`https://lh3.googleusercontent.com/d/${sdg.image}`}
                                        className="size-14 object-contain"
                                    />
                                ))}
                            </div>
                        </div>
                        <ImageZoom>
                            <img
                                src={`https://lh3.googleusercontent.com/d/${article.image}`}
                                className="size-full object-cover"
                            />
                        </ImageZoom>
                        <p className="whitespace-pre-line text-gray-600">
                            {article.description}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    );
}

Article.layout = (page: ReactPortal) => <WebLayout children={page} />;
