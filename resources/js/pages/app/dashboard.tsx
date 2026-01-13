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
import { SDG_COLORS } from "@/components/others";

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
                        <ChartLegend
                            content={
                                <ChartLegendContent className="flex flex-wrap gap-4" />
                            }
                        />
                        {sdgs.map((sdg) => (
                            <Bar
                                key={sdg.id}
                                dataKey={sdg.name}
                                stackId="a"
                                fill={SDG_COLORS[sdg.name]}
                                radius={[4, 4, 4, 4]}
                            />
                        ))}
                    </BarChart>
                </ChartContainer>
            </CardContent>
        </Card>
    );
}

Dashboard.layout = (page: ReactPortal) => <AppLayout children={page} />;
