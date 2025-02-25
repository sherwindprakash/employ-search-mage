
import { useState } from "react";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";
import { Label } from "@/components/ui/label";
import { Search as SearchIcon } from "lucide-react";

interface SearchProps {
  onSearch: (searchParams: any) => void;
  isLoading: boolean;
}

export const Search = ({ onSearch, isLoading }: SearchProps) => {
  const [ruleName, setRuleName] = useState("");
  const [couponCode, setCouponCode] = useState("");
  const [orderNumber, setOrderNumber] = useState("");
  const [status, setStatus] = useState("All");
  const [fromDate, setFromDate] = useState("2019-01-01");
  const [toDate, setToDate] = useState("2023-12-31");

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    onSearch({
      ruleName,
      couponCode,
      orderNumber,
      status,
      fromDate,
      toDate
    });
  };

  return (
    <form onSubmit={handleSubmit} className="space-y-4">
      <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div className="space-y-2">
          <Label htmlFor="ruleName">Rule Name</Label>
          <Input
            id="ruleName"
            value={ruleName}
            onChange={(e) => setRuleName(e.target.value)}
            placeholder="Enter rule name"
          />
        </div>
        
        <div className="flex items-center justify-center">
          <span className="text-gray-500 font-medium">OR</span>
        </div>
        
        <div className="space-y-2">
          <Label htmlFor="couponCode">Coupon code</Label>
          <Input
            id="couponCode"
            value={couponCode}
            onChange={(e) => setCouponCode(e.target.value)}
            placeholder="Enter coupon code"
          />
        </div>
      </div>
      
      <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div className="space-y-2">
          <Label htmlFor="orderNumber">Order number</Label>
          <Input
            id="orderNumber"
            value={orderNumber}
            onChange={(e) => setOrderNumber(e.target.value)}
            placeholder="Enter order number"
          />
        </div>
        
        <div className="flex items-center justify-center">
          <span className="text-gray-500 font-medium">OR</span>
        </div>
        
        <div className="space-y-2">
          <Label htmlFor="status">Status</Label>
          <Select value={status} onValueChange={setStatus}>
            <SelectTrigger>
              <SelectValue placeholder="Select status" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="All">All</SelectItem>
              <SelectItem value="Complete">Complete</SelectItem>
              <SelectItem value="Processing">Processing</SelectItem>
              <SelectItem value="Pending">Pending</SelectItem>
              <SelectItem value="Canceled">Canceled</SelectItem>
            </SelectContent>
          </Select>
        </div>
      </div>
      
      <div className="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
        <div className="space-y-2">
          <Label htmlFor="fromDate">From</Label>
          <Input
            id="fromDate"
            type="date"
            value={fromDate}
            onChange={(e) => setFromDate(e.target.value)}
          />
        </div>
        
        <div className="space-y-2">
          <Label htmlFor="toDate">To</Label>
          <Input
            id="toDate"
            type="date"
            value={toDate}
            onChange={(e) => setToDate(e.target.value)}
          />
        </div>
        
        <div>
          <Button type="submit" className="w-full" disabled={isLoading}>
            {isLoading ? (
              <span className="flex items-center">
                <svg className="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
                  <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Searching...
              </span>
            ) : (
              <span className="flex items-center">
                <SearchIcon className="mr-2 h-4 w-4" />
                Submit
              </span>
            )}
          </Button>
        </div>
      </div>
    </form>
  );
};
