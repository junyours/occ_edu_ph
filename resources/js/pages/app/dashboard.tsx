import AppLayout from "@/layouts/app-layout";
import { ReactPortal } from "react";
import { Bar, BarChart, CartesianGrid, XAxis } from "recharts";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import {
    ChartContainer,
    ChartLegend,
    ChartLegendContent,
    ChartTooltip,
    ChartTooltipContent,
    type ChartConfig,
} from "@/components/ui/chart";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { router, usePage } from "@inertiajs/react";
import { PageProps } from "@/types";

interface Sdg {
    id: number;
    name: string;
}

interface Props extends PageProps {
    chartData: any[];
    sdgs: Sdg[];
    years: number[];
    year: number;
}

const SDG_COLORS: Record<string, string> = {
    "sdg-1": "#E5243B",
    "sdg-2": "#DDA63A",
    "sdg-3": "#4C9F38",
    "sdg-4": "#C5192D",
    "sdg-5": "#FF3A21",
    "sdg-6": "#26BDE2",
    "sdg-7": "#FCC30B",
    "sdg-8": "#A21942",
    "sdg-9": "#FD6925",
    "sdg-10": "#DD1367",
    "sdg-11": "#FD9D24",
    "sdg-12": "#BF8B2E",
    "sdg-13": "#3F7E44",
    "sdg-14": "#0A97D9",
    "sdg-15": "#56C02B",
    "sdg-16": "#00689D",
    "sdg-17": "#19486A",
};

export default function Dashboard() {
    const { chartData, sdgs, years, year } = usePage<Props>().props;

    const chartConfig = sdgs.reduce((acc, sdg) => {
        acc[sdg.name] = {
            label: sdg.name.toUpperCase(),
        };
        return acc;
    }, {} as ChartConfig);

    return (
        <Card>
            <CardHeader className="flex items-center gap-2 space-y-0 border-b py-5 sm:flex-row">
                <div className="grid flex-1 gap-1">
                    <CardTitle>SDG Usage per Month</CardTitle>
                    <CardDescription>January – December {year}</CardDescription>
                </div>
                <Select
                    value={String(year)}
                    onValueChange={(value) =>
                        router.get(
                            route("dashboard"),
                            { year: value },
                            { preserveState: true }
                        )
                    }
                >
                    <SelectTrigger className="w-[160px]">
                        <SelectValue placeholder="Select year" />
                    </SelectTrigger>

                    <SelectContent>
                        {years.map((y) => (
                            <SelectItem key={y} value={String(y)}>
                                {y}
                            </SelectItem>
                        ))}
                    </SelectContent>
                </Select>
            </CardHeader>

            <CardContent>
                <ChartContainer config={chartConfig}>
                    <BarChart data={chartData}>
                        <CartesianGrid vertical={false} />
                        <XAxis
                            dataKey="month"
                            tickLine={false}
                            axisLine={false}
                            tickFormatter={(v) => v.slice(0, 3)}
                        />
                        <ChartTooltip content={<ChartTooltipContent />} />
                        <ChartLegend content={<ChartLegendContent />} />
                        {sdgs.map((sdg) => (
                            <Bar
                                key={sdg.id}
                                dataKey={sdg.name}
                                stackId="a"
                                radius={[4, 4, 0, 0]}
                                fill={SDG_COLORS[sdg.name]}
                            />
                        ))}
                    </BarChart>
                </ChartContainer>
            </CardContent>
        </Card>
    );
}

Dashboard.layout = (page: ReactPortal) => <AppLayout children={page} />;
