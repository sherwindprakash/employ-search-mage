
import { useState } from "react";
import { Search } from "@/components/Search";
import { ReportTable } from "@/components/ReportTable";
import { Button } from "@/components/ui/button";
import { useToast } from "@/components/ui/use-toast";
import { ArrowLeft } from "lucide-react";

const mockData = [
  {
    id: 1,
    ruleName: "Employee Discount A",
    code: "EMP10OFF",
    order: "100000123",
    status: "Complete",
    customer: "John Doe",
    orderDate: "2023-05-15",
    subtotal: 150.00,
    discount: 15.00,
    products: "Gift Card (Amnesty) x1"
  },
  {
    id: 2,
    ruleName: "Employee Discount B",
    code: "EMP20OFF",
    order: "100000124",
    status: "Processing",
    customer: "Jane Smith",
    orderDate: "2023-05-16",
    subtotal: 200.00,
    discount: 40.00,
    products: "Gift Card (Amnesty) x2"
  },
  {
    id: 3,
    ruleName: "Employee Discount C",
    code: "EMP15OFF",
    order: "100000125",
    status: "Complete",
    customer: "Robert Brown",
    orderDate: "2023-05-17",
    subtotal: 175.00,
    discount: 26.25,
    products: "Gift Card (Amnesty) x1, Other Product x1"
  }
];

const Index = () => {
  const { toast } = useToast();
  const [searchResults, setSearchResults] = useState(mockData);
  const [isLoading, setIsLoading] = useState(false);

  const handleSearch = (searchParams: any) => {
    setIsLoading(true);
    
    // This would be replaced with an actual API call in a Magento implementation
    setTimeout(() => {
      // Simulate filtering based on search params
      const results = mockData.filter(item => {
        if (searchParams.ruleName && !item.ruleName.toLowerCase().includes(searchParams.ruleName.toLowerCase())) {
          return false;
        }
        if (searchParams.couponCode && !item.code.toLowerCase().includes(searchParams.couponCode.toLowerCase())) {
          return false;
        }
        if (searchParams.orderNumber && !item.order.includes(searchParams.orderNumber)) {
          return false;
        }
        if (searchParams.status && searchParams.status !== "All" && item.status !== searchParams.status) {
          return false;
        }
        
        // Date filtering would be implemented here in a real scenario
        
        return true;
      });
      
      setSearchResults(results);
      setIsLoading(false);
      
      toast({
        title: "Search Complete",
        description: `Found ${results.length} results`,
      });
    }, 800);
  };

  return (
    <div className="min-h-screen bg-gray-50">
      <div className="container mx-auto px-4 py-8">
        <div className="bg-white rounded-lg shadow-sm p-6">
          <div className="mb-6">
            <div className="flex items-center mb-4">
              <a href="#" className="text-blue-500 hover:text-blue-700 flex items-center text-sm">
                <ArrowLeft className="h-4 w-4 mr-1" />
                Return to list of custom scripts
              </a>
            </div>
            <h1 className="text-2xl font-bold text-gray-800">Employee Discount Report</h1>
          </div>
          
          <Search onSearch={handleSearch} isLoading={isLoading} />
          
          <div className="mt-8">
            <ReportTable data={searchResults} isLoading={isLoading} />
          </div>
        </div>
      </div>
    </div>
  );
};

export default Index;
